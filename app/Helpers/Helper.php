<?php

namespace App\Helpers;

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
                    <td>". ($menu->active == 1 ? "<span class='btn btn-success'>Kích hoạt</span>" : "<span class='btn btn-warning'>Không kích hoạt</span>") ."</td>
                    <td>
                        <a href='" . route('admin.menu.edit', $menu->id) . "' class='btn btn-primary btn-sm'>
                            <i class='fa fa-edit'></i>
                        </a>
                        <a onclick='removeRow(".$menu->id.", \"".route('admin.menu.destroy', $menu->id)."\")' class='btn btn-danger btn-sm'>
                            <i class='fa fa-trash-o'></i>
                        </a>
                    </td>
                </tr>
                ";
                $html .= self::menus($menus, $menu->id, $char.'--');
            }
        }
        return $html;
    }
}