<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Media extends Model {
    protected $fillable = ['genre_id', 'title', 'type', 'status', 'release_date', 'summary', 'trailer'];
}
?>
