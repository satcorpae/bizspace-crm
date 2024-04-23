<?php

namespace App\Livewire;

use Livewire\Component;
use App\Charts\charter;
class Dashboard extends Component
{
public array $myChart = [
    'type' => 'bar',
    'data' => [
        'labels' => ['Jan', 'Feb', 'mar' , 'apr' , 'may' , 'jun' , 'jul' , 'aug' , 'sep' , 'oct' , 'nov' , 'dec'],
        'datasets' => [
            [
                'label' => '# of Votes',
                'data' => [12, 19, 3 ,6 ,8,5,2,8,12,4,15,12,9],
                'backgroundColor' => [
                    'rgb(74,0,255)',   // Red
                    'rgb(74,0,255)',   // Blue
                    'rgb(74,0,255)',   // Yellow
                ],
            ],
        ],
    ],
    'options' => [
        'scales' => [
            'y' => [
                'grid' => [
                    'display' => false
                ]
            ],
            'x' => [
                'grid' => [
                    'display' => false
                ]
            ],
        ]
    ]
];
    public array $lineChart = [
    'type' => 'line',
    'data' => [
        'labels' => ['Mary', 'Joe', 'Ana'],
        'datasets' => [
            [
                'label' => '# of Votes',
                'data' => [12, 19, 3],
            ]
        ]
    ]
];
    public function mount(){
        $this->showChart();
    }
    public function render()
    {
         $chart = new charter;
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('My dataset', 'line', [1, 2, 3, 4]);
        $chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);
        return view('livewire.dashboard', [
            'chart' => $chart
        ]);
    }
    public function showChart(){
        $chart = new charter;
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('My dataset', 'line', [1, 2, 3, 4]);
        $chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);
    }
}
