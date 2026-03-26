<?php
// declare strict types
declare(strict_types=1);
// namespace Libraries
namespace App\Libraries;
// use Time from codeigniter
use CodeIgniter\I18n\Time;
// @class
class TimeService
{
    /**
     * Membuat perbandingan waktu
     * 
     * @param string $target_datetime waktu yang dijadikan sebagai target. format YYYY-MM-DD H:M:S
     * 
     * @return array ["days", "hours", "minutes", "seconds"]
     */
    public function getDifference(string $target_datetime): array
    {
        $target_datetime = Time::parse($target_datetime);
        $current_datetime = Time::now();
        $time_diff = $current_datetime->difference($target_datetime);
        return [
            "days" => $time_diff->days,
            "hours" => $time_diff->hours,
            "minutes" => $time_diff->minutes,
            "seconds" => $time_diff->seconds,
        ];
    }
    /**
     * Ubah format tanggal menjadi format user-friendly
     * 
     * @param string|array $date jika value date bukan diambil dari database, gunakan string. cth: 1990-01-01
     * 
     * @return string 01 Januari 1990
     */
    public function translateDate(string|array $date): string
    {
        return Time::parse($date)->toLocalizedString("dd MMMM YYYY");
    }
}
