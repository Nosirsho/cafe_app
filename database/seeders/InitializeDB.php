<?php

namespace Database\Seeders;

use App\Models\Casta;
use App\Models\Dish;
use App\Models\DishCategory;
use App\Models\MeasurementUnit;
use App\Models\Place;
use App\Models\PlaceCategory;
use App\Models\PlaceState;

class  InitializeDB
{
    public static function initialize(): void
    {
        print_r("Start Initial data base" . PHP_EOL);
        self::initCasta();
        self::initPlaceCategory();
        self::initPlaceState();
        self::initPlace();
        self::initDishCategoty();
        self::initMeasurmentUnit();
        self::initDish();
        print_r("End Initial data base" . PHP_EOL);
    }

    public static function initCasta(): void
    {
        $casta_oficiant = ['title' => 'Официант'];
        $casta_povar = ['title' => 'Повар'];
        $casta_manager = ['title' => 'Менеджер'];
        Casta::create($casta_oficiant);
        Casta::create($casta_povar);
        Casta::create($casta_manager);
        print_r("____Castas created" . PHP_EOL);
    }

    public static function initPlaceCategory(): void
    {
        $plCatKabina = [
            'title' => 'Кабина',
            'markup' => '15',
        ];
        $plCatZal = [
            'title' => 'Зал',
            'markup' => '0',
        ];
        $plCatBesedka = [
            'title' => 'Беседка',
            'markup' => '10',
        ];
        PlaceCategory::create($plCatKabina);
        PlaceCategory::create($plCatZal);
        PlaceCategory::create($plCatBesedka);
        print_r("____PlaceCategories created" . PHP_EOL);
    }

    public static function initPlaceState(): void
    {
        $plStOccupied = [
            'title' => 'Занят',
            'code' => 'OCCUPIED',
        ];
        $plStFree = [
            'title' => 'Свободен',
            'code' => 'FREE',
        ];
        PlaceState::create($plStOccupied);
        PlaceState::create($plStFree);

        print_r("____PlaceStates created" . PHP_EOL);
    }

    public static function initPlace(): void
    {
        $kabina = PlaceCategory::find(1);
        $places = null;
        for ($i = 1; $i <= 10; $i++) {
            $places[$i] = [
                'title' => 'Кабина ' . $i,
                'place_categories_id' => $kabina->id,
                'place_states_id' => PlaceState::get()->random()->id
            ];
        }
        foreach ($places as $place) {
            Place::create($place);
        }
        $zal = PlaceCategory::find(2);
        $places = null;
        for ($i = 1; $i <= 30; $i++) {
            $places[$i] = [
                'title' => 'Столик ' . $i,
                'place_categories_id' => $zal->id,
                'place_states_id' => PlaceState::get()->random()->id
            ];
        }
        foreach ($places as $place) {
            Place::create($place);
        }
        $besedka = PlaceCategory::find(3);
        $places = null;
        for ($i = 1; $i <= 5; $i++) {
            $places[$i] = [
                'title' => 'Беседка ' . $i,
                'place_categories_id' => $besedka->id,
                'place_states_id' => PlaceState::get()->random()->id
            ];
        }
        foreach ($places as $place) {
            Place::create($place);
        }

        print_r("____Place created" . PHP_EOL);
    }

    public static function initDishCategoty(): void
    {
        $dish_ctg_first = ['title' => 'Первое'];
        $dish_ctg_second = ['title' => 'Второе'];
        $dish_ctg_desert = ['title' => 'Десерт'];
        $dish_ctg_salat = ['title' => 'Салат'];

        DishCategory::create($dish_ctg_first);
        DishCategory::create($dish_ctg_second);
        DishCategory::create($dish_ctg_desert);
        DishCategory::create($dish_ctg_salat);
        print_r("____DishCategories created" . PHP_EOL);
    }

    public static function initMeasurmentUnit(): void
    {
        $muGramm = [
            'title' => 'Грам',
            'symbol' => 'г',
            'value' => 100,
        ];
        $muPortion = [
            'title' => 'Порция',
            'symbol' => 'прц',
            'value' => 0.5
        ];
        $muPiece = [
            'title' => 'Штук',
            'symbol' => 'шт',
            'value' => 1
        ];

        MeasurementUnit::create($muGramm);
        MeasurementUnit::create($muPortion);
        MeasurementUnit::create($muPiece);
        print_r("____MeasurmentUnits created" . PHP_EOL);
    }

    public static function initDish(): void
    {
        $muPortion = MeasurementUnit::find(2);
        $muPiece = MeasurementUnit::find(3);

        $dcFirst = DishCategory::find(1);
        $dcDesert = DishCategory::find(3);
        $dishCtg1_1 = [
            'title' => 'Чавари',
            'price' => '8',
            'measurement_units_id' => $muPortion->id,
            'dish_categories_id' => $dcFirst->id
        ];
        $dishCtg1_2 = [
            'title' => 'Мастова',
            'price' => '8',
            'measurement_units_id' => $muPortion->id,
            'dish_categories_id' => $dcFirst->id
        ];
        $dishCtg1_3 = [
            'title' => 'Шурбо',
            'price' => '6',
            'measurement_units_id' => $muPortion->id,
            'dish_categories_id' => $dcFirst->id
        ];
        $dishCtg3_1 = [
            'title' => 'Торт Наполеон',
            'price' => '9',
            'measurement_units_id' => $muPiece->id,
            'dish_categories_id' => $dcDesert->id
        ];
        $dishCtg3_2 = [
            'title' => 'Мороженное',
            'price' => '12',
            'measurement_units_id' => $muPiece->id,
            'dish_categories_id' => $dcDesert->id
        ];
        Dish::create($dishCtg1_1);
        Dish::create($dishCtg1_2);
        Dish::create($dishCtg1_3);
        Dish::create($dishCtg3_1);
        Dish::create($dishCtg3_2);
        print_r("____Dishes created" . PHP_EOL);
    }
}
