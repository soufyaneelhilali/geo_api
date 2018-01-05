<?php
/**
 * Created by PhpStorm.
 * User: smigal
 * Date: 21/03/17
 * Time: 10:33 م
 */

namespace App\Repositories;


use App\Theme;

class ThemeRepository extends Repository
{
	// ila 39alti ach dar $this-repository-index yak?ah o hena makinach méthode index ach ghady yedirghaymchi l classe repositotry walakin 9belma index a ch ghdi y texectuera construction dyal  l'objet m3alam o had constructeur ach kay sift l class mére le model? oui le model Layer
    public function __construct(Theme $model)
    {
        parent::__construct($model);
    }
}