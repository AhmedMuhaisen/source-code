<?php

namespace Database\Seeders\role;



use App\Models\permission;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data= [
            ['code'=>'User.index'  ,'name'=>' رؤية إدارة المستخدمين'],
            ['code'=>'User.create'  ,'name'=>'إضافة مستخدم'],
            ['code'=>'User.Update'  ,'name'=>'تعديل مستخدم'],
            ['code'=>'User.delete'  ,'name'=>'حذف مستخدم'],
            ['code'=>'User.restore'  ,'name'=>'إستعادة مستخدم'],
            ['code'=>'User.forceDelete'  ,'name'=>'حذف مستخدم نهائياً'],


            ['code'=>'Employee.index'  ,'name'=>' رؤية إدارة الموظفين'],
            ['code'=>'Employee.create'  ,'name'=>'إضافة موظف'],
            ['code'=>'Employee.Update'  ,'name'=>'تعديل موظف'],
            ['code'=>'Employee.delete'  ,'name'=>'حذف موظف'],
            ['code'=>'Employee.restore'  ,'name'=>'إستعادة موظف'],
            ['code'=>'Employee.forceDelete'  ,'name'=>'حذف موظف نهائياً'],


            ['code'=>'Restaurant.index'  ,'name'=>' رؤية إدارة المطاعم'],
            ['code'=>'Restaurant.create'  ,'name'=>'إضافة المطعم'],
            ['code'=>'Restaurant.Update'  ,'name'=>'تعديل المطعم'],
            ['code'=>'Restaurant.delete'  ,'name'=>'حذف المطعم'],
            ['code'=>'Restaurant.restore'  ,'name'=>'إستعادة المطعم'],
            ['code'=>'Restaurant.forceDelete'  ,'name'=>'حذف المطعم نهائياً'],



            ['code'=>'Product.index'  ,'name'=>' رؤية إدارة الوجبات'],
            ['code'=>'Product.create'  ,'name'=>'إضافة الوجبات'],
            ['code'=>'Product.Update'  ,'name'=>'تعديل الوجبات'],
            ['code'=>'Product.delete'  ,'name'=>'حذف الوجبات'],
            ['code'=>'Product.restore'  ,'name'=>'إستعادة الوجبات'],
            ['code'=>'Product.forceDelete'  ,'name'=>'حذف الوجبات نهائياً'],

            ['code'=>'Order.index'  ,'name'=>' رؤية إدارة الطلبات'],
            ['code'=>'Order.create'  ,'name'=>'إضافة الطلبات'],
            ['code'=>'Order.Update'  ,'name'=>'تعديل الطلبات'],
            ['code'=>'Order.delete'  ,'name'=>'حذف الطلبات'],
            ['code'=>'Order.restore'  ,'name'=>'إستعادة الطلبات'],
            ['code'=>'Order.forceDelete'  ,'name'=>'حذف الطلبات نهائياً'],


            ['code'=>'Category.index'  ,'name'=>' رؤية إدارة الأقسام'],
            ['code'=>'Category.create'  ,'name'=>'إضافة الأقسام'],
            ['code'=>'Category.Update'  ,'name'=>'تعديل الأقسام'],
            ['code'=>'Category.delete'  ,'name'=>'حذف الأقسام'],
            ['code'=>'Category.restore'  ,'name'=>'إستعادة الأقسام'],
            ['code'=>'Category.forceDelete'  ,'name'=>'حذف الأقسام نهائياً'],




            ['code'=>'role.index'  ,'name'=>' رؤية إدارة الأدمن'],
            ['code'=>'role.create'  ,'name'=>'إضافة الأدمن'],
            ['code'=>'role.Update'  ,'name'=>'تعديل الأدمن'],
            ['code'=>'role.delete'  ,'name'=>'حذف الأدمن'],
            ['code'=>'role.restore'  ,'name'=>'إستعادة الأدمن'],
            ['code'=>'role.forceDelete'  ,'name'=>'حذف الأدمن نهائياً'],





            ['code'=>'permission.index'  ,'name'=>' رؤية إدارة الصلاحيات'],
            ['code'=>'permission.create'  ,'name'=>'إضافة الصلاحيات'],
            ['code'=>'permission.Update'  ,'name'=>'تعديل الصلاحيات'],
            ['code'=>'permission.delete'  ,'name'=>'حذف الصلاحيات'],
            ['code'=>'permission.restore'  ,'name'=>'إستعادة الصلاحيات'],
            ['code'=>'permission.forceDelete'  ,'name'=>'حذف الصلاحيات نهائياً'],






            ['code'=>'role-permission.index'  ,'name'=>' رؤية إدارة صلاحيات الأدمن'],
            ['code'=>'role-permission.create'  ,'name'=>'إضافة صلاحيات لأدمن'],
            ['code'=>'role-permission.Update'  ,'name'=>'تعديل صلاحيات الأدمن'],
            ['code'=>'role-permission.delete'  ,'name'=>'حذف صلاحيات الأدمن'],
            ['code'=>'role-permission.restore'  ,'name'=>'إستعادة صلاحيات الأدمن'],
            ['code'=>'role-permission.forceDelete'  ,'name'=>'حذف صلاحيات الأدمن نهائياً'],



            ['code'=>'role-user.index'  ,'name'=>' رؤية إدارة صلاحيات المستخدمين'],
            ['code'=>'role-user.create'  ,'name'=>'إضافة صلاحيات لمستخدم'],
            ['code'=>'role-user.Update'  ,'name'=>'تعديل صلاحيات المستخد'],
            ['code'=>'role-user.delete'  ,'name'=>'حذف صلاحيات المستخدم'],
            ['code'=>'role-user.restore'  ,'name'=>'إستعادة صلاحيات المستخدم'],
            ['code'=>'role-user.forceDelete'  ,'name'=>'حذف صلاحيات المستخدم نهائياً'],



        ];
        Permission::insert($data);
    }
}
