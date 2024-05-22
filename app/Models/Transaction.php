<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Motorcycle; // Add this line

use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function motorcycle():belongsTo
    {
        return $this->belongsTo(Motorcycle::class, 'id_motorcycle');
    }

    public function getDurationAttribute()
    {
        return Carbon::parse($this->attributes['rental_date'])->diffInDays(Carbon::parse($this->attributes['return_date']));
    }

    public function getPriceAttribute()
    {
        $motorcycle = Motorcycle::find($this->attributes['id_motorcycle']);
        $fee = $this->getDurationAttribute() * $motorcycle->fee;
        return $fee;
    }


}
?>
