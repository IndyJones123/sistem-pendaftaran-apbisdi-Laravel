<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\sertifikatindividu;
use App\Models\sertifikatkaprodi;
use App\Models\pt;
use App\Models\individu;
use Carbon\Carbon;

class InsertDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    // Mendapatkan tanggal hari ini
    $today = Carbon::today();

    // Update status untuk record yang tanggal_berakhir kurang dari hari ini
    $updatedRows1 = sertifikatindividu::where('tglberakhir', '<', $today)
        ->update(['status' => 'expired']);
    
    // Update status untuk record yang tanggal_berakhir kurang dari hari ini
    $updatedRows2 = sertifikatkaprodi::where('tglberakhir', '<', $today)
        ->update(['status' => 'expired']);
    
    // Loop untuk memperbarui status di tabel 'pt'
    $pts = pt::where("status", "active")->get();
    foreach ($pts as $pt) {
        // Cek apakah ada sertifikatkaprodi dengan id_kaprodi yang sesuai dan status 'active'
        $hasActiveSertifikat = sertifikatkaprodi::where('id_kaprodi', $pt->id_user)
            ->where('status', 'active')
            ->exists();

        // Jika tidak ada sertifikat dengan status 'active', update status di tabel 'pt'
        if (!$hasActiveSertifikat) {
            $pt->update(['status' => 'nonactive']);
        }
    }

    // Loop untuk memperbarui status di tabel 'pt'
    $individu = individu::where("status", "active")->get();
    foreach ($individu as $data) {
        // Cek apakah ada sertifikatkaprodi dengan id_kaprodi yang sesuai dan status 'active'
        $hasActiveSertifikat2 = sertifikatindividu::where('id_individu', $data->id_user)
            ->where('status', 'active')
            ->exists();

        // Jika tidak ada sertifikat dengan status 'active', update status di tabel 'pt'
        if (!$hasActiveSertifikat2) {
            $data->update(['status' => 'nonactive']);
        }
    }
    

    $this->info("Updated $updatedRows1 $updatedRows2 records successfully!");
    }
}
