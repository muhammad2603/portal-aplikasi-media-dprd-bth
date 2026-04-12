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
     * @param bool $to_abs ubah waktu dari hasil perbandingan menjadi angka positif.
     * 
     * @return array ["days", "hours", "minutes", "seconds"]
     */
    public function getDifference(string $target_datetime, bool $to_abs = false): array
    {
        $target_datetime = Time::parse($target_datetime);
        $current_datetime = Time::now();
        $time_diff = $current_datetime->difference($target_datetime);
        return [
            "days" => $to_abs ? abs($time_diff->days) : $time_diff->days,
            "hours" => $to_abs ? abs($time_diff->hours) : $time_diff->hours,
            "minutes" => $to_abs ? abs($time_diff->minutes) : $time_diff->minutes,
            "seconds" => $to_abs ? abs($time_diff->seconds) : $time_diff->seconds,
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
    /**
     * Mengubah urutan tanggal dari DD-MM-YYYY menjadi YYYY-MM-DD
     * 
     * @param string $date
     * 
     * @return string
     * 
     // __FIX__ perbaiki logika perubahan urutannya menjadi lebih kustom. contohnya:
     * y-m-d: untuk format default
     * d-m-y: untuk format lain
     * m-d-y: untuk format kustom
     * 
     */
    public function reverseDate(string $date): string
    {
        $reverse_array = array_reverse(explode("-", $date));
        return implode("-", $reverse_array);
    }
}
