<?php

use Illuminate\Database\Seeder;

class LayersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('layers')->delete();
        
        \DB::table('layers')->insert(array (
            0 => 
            array (
                'id' => 22,
                'name' => 'Provinces',
                'user_id' => 1,
                'category_id' => 2,
                'type' => 'VECTOR',
                'featuretype' => 'POLYGON',
                'table_name' => 'provinces',
                'workspace' => 'geoportal',
                'store' => 'geoportal',
                'style' => 'geoportal_provinces3',
                'srs' => 'EPSG:4326',
                'bbox' => '{"minx":-16.88241179411,"miny":20.746148909556,"maxx":-1.0244143049872,"maxy":35.921366609647,"crs":"GEOGCS[\\"WGS 84\\", \\n  DATUM[\\"World Geodetic System 1984\\", \\n    SPHEROID[\\"WGS 84\\", 6378137.0, 298.257223563, AUTHORITY[\\"EPSG\\",\\"7030\\"]], \\n    AUTHORITY[\\"EPSG\\",\\"6326\\"]], \\n  PRIMEM[\\"Greenwich\\", 0.0, AUTHORITY[\\"EPSG\\",\\"8901\\"]], \\n  UNIT[\\"degree\\", 0.017453292519943295], \\n  AXIS[\\"Geodetic longitude\\", EAST], \\n  AXIS[\\"Geodetic latitude\\", NORTH], \\n  AUTHORITY[\\"EPSG\\",\\"4326\\"]]"}',
                'description' => 'Provincs du maroc',
                'img_src' => 'http://localhost:8080/geoserver/geoportal/wms?service=WMS&version=1.1.0&request=GetMap&layers=geoportal:provinces&styles=&bbox=-16.88241179411,20.746148909556,-1.0244143049872,35.921366609647&width=250&height=250&srs=EPSG:4326&format=image%2Fpng',
                'attributs' => NULL,
                'metadata' => '{"name":"provinces","href":"http:\\/\\/localhost:8080\\/geoserver\\/rest\\/imports\\/4\\/tasks\\/0\\/layer","title":"provinces","originalName":"provinces","nativeName":"provinces","srs":"EPSG:4326","bbox":{"minx":-16.88241179411,"miny":20.746148909556,"maxx":-1.0244143049872,"maxy":35.921366609647,"crs":"GEOGCS[\\"WGS 84\\", \\n  DATUM[\\"World Geodetic System 1984\\", \\n    SPHEROID[\\"WGS 84\\", 6378137.0, 298.257223563, AUTHORITY[\\"EPSG\\",\\"7030\\"]], \\n    AUTHORITY[\\"EPSG\\",\\"6326\\"]], \\n  PRIMEM[\\"Greenwich\\", 0.0, AUTHORITY[\\"EPSG\\",\\"8901\\"]], \\n  UNIT[\\"degree\\", 0.017453292519943295], \\n  AXIS[\\"Geodetic longitude\\", EAST], \\n  AXIS[\\"Geodetic latitude\\", NORTH], \\n  AUTHORITY[\\"EPSG\\",\\"4326\\"]]"},"attributes":[{"name":"the_geom","binding":"com.vividsolutions.jts.geom.MultiPolygon"},{"name":"POP_TOT","binding":"java.lang.Double"},{"name":"MENAGES","binding":"java.lang.Double"},{"name":"NOM_PROV","binding":"java.lang.String"},{"name":"POP_URB","binding":"java.lang.Double"},{"name":"POP_RUR","binding":"java.lang.Double"},{"name":"WILAYA","binding":"java.lang.String"},{"name":"superficie","binding":"java.lang.Double"},{"name":"X","binding":"java.lang.Double"},{"name":"Y","binding":"java.lang.Double"},{"name":"densit","binding":"java.lang.Double"}],"style":{"name":"geoportal_provinces3","href":"http:\\/\\/localhost:8080\\/geoserver\\/rest\\/imports\\/4\\/tasks\\/0\\/layer\\/style"}}',
                'file' => '/tmp/php70wkUp',
                'approve' => false,
                'share' => false,
                'created_at' => '2017-06-06 02:20:07',
                'updated_at' => '2017-06-06 02:20:07',
            ),
            1 => 
            array (
                'id' => 23,
                'name' => 'Communes',
                'user_id' => 1,
                'category_id' => 2,
                'type' => 'VECTOR',
                'featuretype' => 'POLYGON',
                'table_name' => 'communes',
                'workspace' => 'geoportal',
                'store' => 'geoportal',
                'style' => 'geoportal_communes',
                'srs' => 'EPSG:4326',
                'bbox' => '{"minx":-16.88241179411,"miny":20.746148909556,"maxx":-1.0244143049872,"maxy":35.921366609647,"crs":"GEOGCS[\\"WGS 84\\", \\n  DATUM[\\"World Geodetic System 1984\\", \\n    SPHEROID[\\"WGS 84\\", 6378137.0, 298.257223563, AUTHORITY[\\"EPSG\\",\\"7030\\"]], \\n    AUTHORITY[\\"EPSG\\",\\"6326\\"]], \\n  PRIMEM[\\"Greenwich\\", 0.0, AUTHORITY[\\"EPSG\\",\\"8901\\"]], \\n  UNIT[\\"degree\\", 0.017453292519943295], \\n  AXIS[\\"Geodetic longitude\\", EAST], \\n  AXIS[\\"Geodetic latitude\\", NORTH], \\n  AUTHORITY[\\"EPSG\\",\\"4326\\"]]"}',
                'description' => 'communes du maroc',
                'img_src' => 'http://localhost:8080/geoserver/geoportal/wms?service=WMS&version=1.1.0&request=GetMap&layers=geoportal:communes&styles=&bbox=-16.88241179411,20.746148909556,-1.0244143049872,35.921366609647&width=250&height=250&srs=EPSG:4326&format=image%2Fpng',
                'attributs' => NULL,
                'metadata' => '{"name":"communes","href":"http:\\/\\/localhost:8080\\/geoserver\\/rest\\/imports\\/5\\/tasks\\/0\\/layer","title":"communes","originalName":"communes","nativeName":"communes","srs":"EPSG:4326","bbox":{"minx":-16.88241179411,"miny":20.746148909556,"maxx":-1.0244143049872,"maxy":35.921366609647,"crs":"GEOGCS[\\"WGS 84\\", \\n  DATUM[\\"World Geodetic System 1984\\", \\n    SPHEROID[\\"WGS 84\\", 6378137.0, 298.257223563, AUTHORITY[\\"EPSG\\",\\"7030\\"]], \\n    AUTHORITY[\\"EPSG\\",\\"6326\\"]], \\n  PRIMEM[\\"Greenwich\\", 0.0, AUTHORITY[\\"EPSG\\",\\"8901\\"]], \\n  UNIT[\\"degree\\", 0.017453292519943295], \\n  AXIS[\\"Geodetic longitude\\", EAST], \\n  AXIS[\\"Geodetic latitude\\", NORTH], \\n  AUTHORITY[\\"EPSG\\",\\"4326\\"]]"},"attributes":[{"name":"the_geom","binding":"com.vividsolutions.jts.geom.MultiPolygon"},{"name":"FID_","binding":"java.lang.Integer"},{"name":"NOM_COM","binding":"java.lang.String"},{"name":"NOM_PROV","binding":"java.lang.String"},{"name":"CERCLE","binding":"java.lang.String"},{"name":"CATEGORI","binding":"java.lang.String"},{"name":"MENAGES","binding":"java.lang.Double"},{"name":"SUPERFICIE","binding":"java.lang.Double"},{"name":"POP82","binding":"java.lang.Double"},{"name":"DENS82","binding":"java.lang.Double"},{"name":"POP94","binding":"java.lang.Double"},{"name":"DENS94","binding":"java.lang.Double"},{"name":"TXACCR","binding":"java.lang.Double"}],"style":{"name":"geoportal_communes","href":"http:\\/\\/localhost:8080\\/geoserver\\/rest\\/imports\\/5\\/tasks\\/0\\/layer\\/style"}}',
                'file' => '/tmp/phps81Hzr',
                'approve' => false,
                'share' => false,
                'created_at' => '2017-06-06 02:20:51',
                'updated_at' => '2017-06-06 02:20:51',
            ),
            2 => 
            array (
                'id' => 24,
                'name' => 'Word',
                'user_id' => 1,
                'category_id' => 2,
                'type' => 'VECTOR',
                'featuretype' => 'POLYGON',
                'table_name' => 'word_2',
                'workspace' => 'geoportal',
                'store' => 'geoportal',
                'style' => 'geoportal_word_213',
                'srs' => 'EPSG:4326',
                'bbox' => '{"minx":-180.00018310547,"miny":-90,"maxx":180,"maxy":83.623031616211,"crs":"GEOGCS[\\"WGS 84\\", \\n  DATUM[\\"World Geodetic System 1984\\", \\n    SPHEROID[\\"WGS 84\\", 6378137.0, 298.257223563, AUTHORITY[\\"EPSG\\",\\"7030\\"]], \\n    AUTHORITY[\\"EPSG\\",\\"6326\\"]], \\n  PRIMEM[\\"Greenwich\\", 0.0, AUTHORITY[\\"EPSG\\",\\"8901\\"]], \\n  UNIT[\\"degree\\", 0.017453292519943295], \\n  AXIS[\\"Geodetic longitude\\", EAST], \\n  AXIS[\\"Geodetic latitude\\", NORTH], \\n  AUTHORITY[\\"EPSG\\",\\"4326\\"]]"}',
                'description' => 'Word countries',
                'img_src' => 'http://localhost:8080/geoserver/geoportal/wms?service=WMS&version=1.1.0&request=GetMap&layers=geoportal:word_2&styles=&bbox=-180.00018310547,-90,180,83.623031616211&width=250&height=250&srs=EPSG:4326&format=image%2Fpng',
                'attributs' => NULL,
                'metadata' => '{"name":"word_2","href":"http:\\/\\/localhost:8080\\/geoserver\\/rest\\/imports\\/6\\/tasks\\/0\\/layer","title":"word_2","originalName":"word_2","nativeName":"word_2","srs":"EPSG:4326","bbox":{"minx":-180.00018310547,"miny":-90,"maxx":180,"maxy":83.623031616211,"crs":"GEOGCS[\\"WGS 84\\", \\n  DATUM[\\"World Geodetic System 1984\\", \\n    SPHEROID[\\"WGS 84\\", 6378137.0, 298.257223563, AUTHORITY[\\"EPSG\\",\\"7030\\"]], \\n    AUTHORITY[\\"EPSG\\",\\"6326\\"]], \\n  PRIMEM[\\"Greenwich\\", 0.0, AUTHORITY[\\"EPSG\\",\\"8901\\"]], \\n  UNIT[\\"degree\\", 0.017453292519943295], \\n  AXIS[\\"Geodetic longitude\\", EAST], \\n  AXIS[\\"Geodetic latitude\\", NORTH], \\n  AUTHORITY[\\"EPSG\\",\\"4326\\"]]"},"attributes":[{"name":"the_geom","binding":"com.vividsolutions.jts.geom.MultiPolygon"},{"name":"NAME","binding":"java.lang.String"},{"name":"GMI_CNTRY","binding":"java.lang.String"},{"name":"REGION","binding":"java.lang.String"}],"style":{"name":"geoportal_word_213","href":"http:\\/\\/localhost:8080\\/geoserver\\/rest\\/imports\\/6\\/tasks\\/0\\/layer\\/style"}}',
                'file' => '/tmp/php4qYxgI',
                'approve' => false,
                'share' => false,
                'created_at' => '2017-06-06 02:21:55',
                'updated_at' => '2017-06-06 02:21:55',
            ),
        ));
        
        
    }
}