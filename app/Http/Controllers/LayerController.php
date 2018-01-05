<?php

namespace App\Http\Controllers;
use App\Layer;
use App\Http\Requests\LayerRequest;
use App\Repositories\LayerRepository;
use Chumper\Zipper\Facades\Zipper;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayerController extends ResourceController
{

    public function __construct(LayerRepository $repository, Request $request)
    {
        // lala7dti la classe fille katsift constructor l parrent
        parent::__construct($repository, $request);
    }

     public function store(LayerRequest $request)
    {

        $path = Storage::disk('geoserver')->put('', $request->file('file'));
        $client  = new \GuzzleHttp\Client(['base_uri' => 'http://localhost:8080/', 'auth' => ['admin', 'geoserver']]);
        $fullpath = $storagePath  = Storage::disk('geoserver')->getDriver()->getAdapter()->getPathPrefix() . $path;
        $type = $request->type;

        if ($type=='RASTER') {

            $data = ['import'=>[
            'targetWorkspace'=>['workspace'=>['name'=>'geoportal']],
            'data'=>['type'=>'file','format'=>'GeoTIFF','file'=>$fullpath]]
        ];
        }else{

            $data = ['import'=>[
            'targetWorkspace'=>['workspace'=>['name'=>'geoportal']],
            'targetStore'=>['dataStore'=>['name'=>'geoportal','type'=>'PostGIS']],
            'data'=>['type'=>'file','format'=>'Shapefile','file'=>$fullpath]]
        ];
        }


        $response = $client->request('POST', 'geoserver/rest/imports?execute=true',[ 'query' => ['execute' => 'true'],'json'=>$data]);

        $response_array = \GuzzleHttp\json_decode($response->getBody(),true);
        if($response_array["import"]["tasks"][0]["state"]=="READY")
        {

            $import_url = $response_array["import"]["href"];
            $client_confirm = new Client(['auth' => ['admin', 'geoserver']]);
            $response_2 = $client->request('POST',$import_url);
            if($response_2->getStatusCode()==204)
            {
                $response_2 = $client->request('GET',$import_url);
                $response_2 = $client->request('GET',$import_url . "/tasks/0/layer");
                $response_2 =  \GuzzleHttp\json_decode($response_2->getBody(),true);
                $layer_name = $response_2["layer"]["name"];
                $layer_style = $response_2["layer"]["style"]["name"];
                $layer_bbox = $response_2["layer"]["bbox"];
                $layer_srs = $response_2["layer"]["srs"];
                $request->merge(['user_id'=>$request->user()->id]);
                $request->merge(['table_name'=>$layer_name]);
                

                $request->merge(['workspace'=>"geoportal"]);
                $request->merge(['store'=>"geoportal"]);

                $request->merge(['bbox'=>\GuzzleHttp\json_encode($layer_bbox,true)]);
                $request->merge(['style'=>$layer_style]);
                $request->merge(['srs'=>$layer_srs]);
                $request->merge(['file'=>$fullpath]);
                $request->merge(['img_src'=>$this->buildImagelink($layer_bbox,$layer_name)]);
                $request->merge(['metadata'=>\GuzzleHttp\json_encode($response_2["layer"],true)]);

                $result = $this->repository->store($request);
                if ($result === false)
                    return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);
                if ($result)
                    return response()->json($this->createResponse($result), 201);
            }
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);

        }
        return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);
    }
    private function buildImagelink($bbox,$name)
    {
        $src = "http://localhost:8080/geoserver/geoportal/wms?service=WMS&version=1.1.0&request=GetMap&layers=geoportal:".$name."&styles=&bbox=".$bbox['minx'].",".$bbox['miny'].",".$bbox['maxx'].",".$bbox['maxy']."&width=250&height=170&srs=EPSG:4326&format=image%2Fpng";
        return $src;
    }

         public function approve(LayerRequest $request)
    {
        $layer = $this->repository->find($request);
        $layer->approve = true;
        $result =  $layer->save();
        if ($result === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);
        if ($result)
            return response()->json($this->createResponse($result), 201);
    }

     public function share(LayerRequest $request)
    {
        $layer = $this->repository->find($request);
        $layer->share = true;
        $result =  $layer->save();
        if ($result === false)
            return response()->json($this->createResponse(null, 403, trans('myErrors.permission')), 403);
        if ($result)
            return response()->json($this->createResponse($result), 201);
    }

}
