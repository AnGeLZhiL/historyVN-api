<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Objects;
use Illuminate\Http\Request;

class ObjectsController extends Controller
{
    /**
     * Вывод объектов определенной категории по её id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function getObjects($id){

        /*
         * Получение списка объектов по заданому id каталога
         */

        $objects = Objects::where('category_id', $id)->get();

        /*
         * Возвращает список объектов
         */

        return response()
            ->json($objects)
            ->setStatusCode(200, 'Objects list');

    }

    /**
     * Вывод объектов определенной категории по её id
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */

    public function getObject($id){

        /*
         * Получение списка объектов по заданому id каталога
         */

        $objects = Objects::where('id_object', $id)->get();

        /*
         * Возвращает список объектов
         */

        return response()
            ->json($objects)
            ->setStatusCode(200, 'Object information');

    }
}
