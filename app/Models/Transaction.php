<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Motorcycle; // Add this line

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions'; 

    protected $fillable = [
        'id_user',
        'id_motorcycle',
        'status',
        'rental_date',
        'return_date',
        'location',
        'duration',
        'price',
    ];

    protected $dates = [
        'rental_date',
        'return_date',
    ];

    protected $appends = ['duration'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function motorcycle()
    {
        return $this->belongsTo(Motorcycle::class);
    }

    public function getDurationAttribute()
    {
        return Carbon::parse($this->attributes['rental_date'])->diffInDays(Carbon::parse($this->attributes['return_date']));
    }

    public function getPriceAttribute()
    {
        $motorcycle = Motorcycle::find($this->attributes['id_motorcycle']);
        $fee = $this->attributes['duration'] * $motorcycle->fee;
        return $fee;
    }


}
?>
