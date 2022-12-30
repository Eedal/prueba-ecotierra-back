<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = "menus";

    protected $fillable = [
        'menu_id', 
        'name', 
        'url', 
        'icon', 
        'order',
        'description'
    ];

    public function getOrderedMenus()
    { 
        return $this->orderby('menu_id')
            ->orderby('order')
            ->get()
            ->toArray();
    }

    public function getChildrens($menus, $line)
    {
        $children = [];
        foreach ($menus as $menu) {
            if ($line['id'] == $menu['menu_id']) {
                $children = array_merge($children, [array_merge($menu, ['submenu' => $this->getChildrens($menus, $menu)])]);
            }
        }
        return $children;
    }

    public static function getMenus() 
    {
        $menu = new Menu();
        $menus = $menu->getOrderedMenus();
        $menuAll = [];
        foreach ($menus as $line) {
            if ($line['menu_id'] != null)
                break;
            $item = [array_merge($line, ['submenu' => $menu->getChildrens($menus, $line)])];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menuAll;
    }
}
