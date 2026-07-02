<?php

namespace App\Filament\Widgets;

use App\Models\Pendonor;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PendonorOverview extends BaseWidget
{
    // Mengatur agar widget ini muncul paling atas di dashboard
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            Stat::make('Golongan Darah A', Pendonor::where('golongan_darah', 'A')->count() . ' Pendonor')
                ->description('Total pendonor terdaftar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('danger') // Warna merah
                ->chart([7, 2, 10, 3, 15, 4, 17]), // Grafik statis pemanis UI

            Stat::make('Golongan Darah B', Pendonor::where('golongan_darah', 'B')->count() . ' Pendonor')
                ->description('Total pendonor terdaftar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('warning') // Warna kuning
                ->chart([3, 12, 4, 10, 5, 14, 8]),

            Stat::make('Golongan Darah AB', Pendonor::where('golongan_darah', 'AB')->count() . ' Pendonor')
                ->description('Total pendonor terdaftar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success') // Warna hijau
                ->chart([1, 4, 2, 7, 3, 5, 6]),

            Stat::make('Golongan Darah O', Pendonor::where('golongan_darah', 'O')->count() . ' Pendonor')
                ->description('Total pendonor terdaftar')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info') // Warna biru
                ->chart([10, 15, 12, 20, 18, 25, 22]),
        ];
    }
}
