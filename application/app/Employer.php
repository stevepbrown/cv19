<?php
namespace App;
use Illuminate\Database\Eloquent\Model;



class Employer extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employers';
    
    
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
     * 
     * Relationship with roles
     */

      /*
      
      Many To Many

      Many-to-many relations are slightly more complicated than hasOne and hasMany relationships. To define this relationship, three database tables are needed. Many-to-many relationships are defined by writing a method that returns the result of the belongsToMany method.

      In this case there is a many-to-many relationship with Roles (An employer can have many roles, a role can be used by many employers)

       To determine the table name of the relationship's joining table, Eloquent will join the two related model names in alphabetical order. However, you are free to override this convention. You may do so by passing a second argument to the belongsToMany method.
       
       In addition to customizing the name of the joining table, you may also customize the column names of the keys on the table by passing additional arguments to the belongsToMany method. The third argument is the foreign key name of the model on which you are defining the relationship, while the fourth argument is the foreign key name of the model that you are joining to
      
      */

    /**
     * 
     * Relationship to roles
     */
      public function roles(){

      /*
      
      Each Role model we retrieve is automatically assigned a pivot attribute. This attribute contains a model representing the intermediate table, and may be used like any other Eloquent model.

      By default, only the model keys will be present on the pivot object. If your pivot table contains extra attributes, you must specify them when defining the relationship:
      
      */  

      return $this->belongsToMany('App\Role','employer_roles');

    }


}
