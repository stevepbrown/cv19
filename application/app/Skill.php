<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB as DB;
class Skill extends Model
{
    protected $children;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'skills';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    /**
     * Appended attributes
     *
     * @return array
     */
     /*
       Appending values to the model will enable those values to be accessible form within the model, as if they were columns in the database, see https://laravel.com/docs/6.x/eloquent-serialization#appending-values-to-json
     */
    protected $appends = array('is_active','sort_order');
    /**
     * function children
     *
     * @return relation
     */
    public function children(){
      return $this->hasMany('app\Skill','parent_skill_id','id');
    }

    /**
     * IsActive attribute (appended)
     *
     * @return boolean
     */
    public function getIsActiveAttribute(){
      $qry = DB::table('entity_attribute_value')->select('value')
        ->where('app_table_id',13) // 'skills'
        ->where('attribute_id',1) // active
        ->where('key',$this->id);

         switch ($qry->pluck('value')->first()) {
          case 0:
            $result = false;
            break;
          
          case 1:
            $result= true;
            break;
          
          default:
            $result = true;
            break;
        }

      
        return (bool) $result;
    
    }
    
    public function getSortOrderAttribute() {

      $qry = DB::table('entity_attribute_value')->select('value')
      ->where('app_table_id',13) // 'skills'
      ->where('attribute_id',2) // 'sort index'
      ->where('key',$this->id);

      return $qry->pluck('value')->first();

    }
}