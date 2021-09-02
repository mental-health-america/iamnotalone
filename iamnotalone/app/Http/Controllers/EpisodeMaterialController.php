<?php

namespace App\Http\Controllers;

use App\Models\EpisodeMaterial;
use Illuminate\Http\Request;

class EpisodeMaterialController extends Controller
{
    /** 
     * Save material for episode in database
     * 
     * @param integer $episodeId 
     * @param string $material path
     * 
     * @return bool
     */
    public function new($episodeId, $material, $description)
    {
        $episdeMaterial = new EpisodeMaterial();
        $episdeMaterial->episode_id = $episodeId;
        $episdeMaterial->material = $material;
        $episdeMaterial->description = $description;
        return $episdeMaterial->save();
    }

    /**
     * @param integer $id Episode Material id
     * 
     * @return boolean
     */
    public function delete($id)
    {
        return EpisodeMaterial::destroy($id);
    }
}
