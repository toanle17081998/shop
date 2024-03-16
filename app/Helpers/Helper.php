<?php

namespace App\Helpers;

use App\Models\Menu;
use Str;

// class Helper
// {
//     public static function menus($menus, $parent_id = 0, $char = "")
//     {
//         $html = "";
//         foreach ($menus as $key => $menu) {
//             if ($menu->parent_id == $parent_id) {
//                 $html .= "
//                 <tr>
//                     <td>$menu->id</td>
//                     <td>$char $menu->name</td>
//                     <td>$menu->description</td>
//                     <td>$menu->active</td>
//                     <td>Sửa | Xoá</td>
//                 </tr>
//                 ";
//                 unset($menus[$key]);
//                 $html .= self::menus($menus, $menu->id, $char.'--');
//             }
//         }
//         return $html;
//     }
// }

// class Helper
// {
//     public static function menus($menus, $parent_id = 0, $char = "")
//     {
//         $html = "";
//         foreach ($menus as $menu) {
//             if ($menu->parent_id == $parent_id) {
//                 $html .= "
//                 <tr>
//                     <td>$menu->id</td>
//                     <td>$char $menu->name</td>
//                     <td>$menu->description</td>
//                     <td>$menu->active</td>
//                     <td>
//                         <a href='{{ route('admin.menu.edit',$menu->id)}}' class='btn btn-primary btn-sm'>
//                             <i class='fa fa-edit'></i>
//                         </a>
//                         <a href='{{ route('admin.menu.destroy',$menu->id)}}' class='btn btn-danger btn-sm'>
//                             <i class='fa fa-trash-o'></i>
//                         </a>
//                     </td>
//                 </tr>
//                 ";
//                 $html .= self::menus($menus, $menu->id, $char.'--');
//             }
//         }
//         return $html;
//     }
// }

class Helper
{
    public static function menus($menus, $parent_id = 0, $char = "")
    {
        $html = "";
        foreach ($menus as $menu) {
            if ($menu->parent_id == $parent_id) {
                $html .= "
                <tr>
                    <td>$menu->id</td>
                    <td>$char $menu->name</td>
                    <td>$menu->description</td>
                    <td>" . ($menu->active == 1 ? "<span class='btn btn-success'>Kích hoạt</span>" : "<span class='btn btn-warning'>Không kích hoạt</span>") . "</td>
                    <td>
                        <a href='" . route('admin.menu.edit', $menu->id) . "' class='btn btn-primary btn-sm'>
                            <i class='fa fa-edit'></i>
                        </a>
                        <a onclick='removeRow(" . $menu->id . ", \"" . route('admin.menu.destroy', $menu->id) . "\")' class='btn btn-danger btn-sm'>
                            <i class='fa fa-trash-o'></i>
                        </a>
                    </td>
                </tr>
                ";
                $html .= self::menus($menus, $menu->id, $char . '--');
            }
        }
        return $html;
    }


    public static function clientMenu($menus, $parent_id = 0, $sub='sub-menu')
{
    $html = '';
                
    foreach ($menus as $menu) {
        if ($menu->parent_id == $parent_id) {
            $html .= '<li>
                            <a href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name) . '.html">' . $menu->name . '</a>';
            if (self::isChild($menus, $menu->id)) {
                $html .= '<ul class="'.$sub.'">';
                $html .= self::clientMenu($menus, $menu->id);
                $html .= '</ul>';
            }
            $html .= '</li>';
        }
    }
    

    return $html;
}

    public static function isChild($menus, $id)
    {
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $id) {
                return true; 
            }
        }
        return false; 
    }


    public static function getCategoryParent($menu_id){
        $category = Menu::where('id',$menu_id)->first();
        if($category->parent_id != 0){
            return $category->name;
        }
        return $category->name;
    }
}