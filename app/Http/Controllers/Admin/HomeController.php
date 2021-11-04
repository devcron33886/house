<?php

namespace App\Http\Controllers\Admin;

use Exception;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController
{
    /**
     * @throws Exception
     */
    public function index()
    {
        $settings1 = [
            'chart_title'           => 'Total users',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\User',
            'group_by_field'        => 'email_verified_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'user',
        ];

        $settings1 = $this->getSettings4($settings1);

        $settings2 = [
            'chart_title'           => 'Total categories',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Category',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'category',
        ];

        $settings2 = $this->getSettings4($settings2);

        $settings3 = [
            'chart_title'           => 'Total house to rent',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\House',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'house',
        ];

        $settings3 = $this->getSettings4($settings3);

        $settings4 = [
            'chart_title'           => 'Total infrastructures',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Infrastructure',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'infrastructure',
        ];

        $settings4 = $this->getSettings4($settings4);

        $settings5 = [
            'chart_title'           => 'House Chart',
            'chart_type'            => 'line',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\House',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'Y-m-d H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '5',
            'translation_key'       => 'house',
        ];

        $chart5 = new LaravelChart($settings5);

        return view('home', compact('settings1', 'settings2', 'settings3', 'settings4', 'chart5'));
    }

    /**
     * @param array $settings4
     * @return array
     */
    public function getSettings4(array $settings4): array
    {
        $settings4['total_number'] = 0;
        if (class_exists($settings4['model'])) {
            $settings4['total_number'] = $settings4['model']::when(isset($settings4['filter_field']), function ($query) use ($settings4) {
                if (isset($settings4['filter_days'])) {
                    return $query->where($settings4['filter_field'], '>=',
                        now()->subDays($settings4['filter_days'])->format('Y-m-d'));
                }
                if (isset($settings4['filter_period'])) {
                    switch ($settings4['filter_period']) {
                        case 'week':
                            $start = date('Y-m-d', strtotime('last Monday'));
                            break;
                        case 'month':
                            $start = date('Y-m') . '-01';
                            break;
                        case 'year':
                            $start = date('Y') . '-01-01';
                            break;
                    }
                    if (isset($start)) {
                        return $query->where($settings4['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings4['aggregate_function'] ?? 'count'}($settings4['aggregate_field'] ?? '*');
        }
        return $settings4;
    }
}
