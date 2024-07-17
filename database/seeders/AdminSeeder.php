<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$luvyBtfKZkES7eo2yG8xLemhbSO.oIhBhlU6slWC6F.qEMkXQ8Wou', // 12345678
        ]);

        $admin->assignRole('admin');

        $permission = Permission::create(['name' => 'Role access']);
        $permission = Permission::create(['name' => 'Role edit']);
        $permission = Permission::create(['name' => 'Role create']);
        $permission = Permission::create(['name' => 'Role delete']);

        $permission = Permission::create(['name' => 'User access']);
        $permission = Permission::create(['name' => 'User edit']);
        $permission = Permission::create(['name' => 'User create']);
        $permission = Permission::create(['name' => 'User delete']);
        $permission = Permission::create(['name' => 'User update role']);

        $permission = Permission::create(['name' => 'Permission access']);
        $permission = Permission::create(['name' => 'Permission edit']);
        $permission = Permission::create(['name' => 'Permission create']);
        $permission = Permission::create(['name' => 'Permission delete']);

        $permission = Permission::create(['name' => 'Attendance access']);
        $permission = Permission::create(['name' => 'Attendance create']);
        $permission = Permission::create(['name' => 'Attendance edit']);
        $permission = Permission::create(['name' => 'Attendance delete']);

        $permission = Permission::create(['name' => 'Classes access']);
        $permission = Permission::create(['name' => 'Classes create']);
        $permission = Permission::create(['name' => 'Classes edit']);
        $permission = Permission::create(['name' => 'Classes delete']);

        $permission = Permission::create(['name' => 'Dashbord access']);
        $permission = Permission::create(['name' => 'Dashbord create']);
        $permission = Permission::create(['name' => 'Dashbord edit']);
        $permission = Permission::create(['name' => 'Dashbord delete']);

        $permission = Permission::create(['name' => 'Exam access']);
        $permission = Permission::create(['name' => 'Exam create']);
        $permission = Permission::create(['name' => 'Exam edit']);
        $permission = Permission::create(['name' => 'Exam delete']);

        $permission = Permission::create(['name' => 'ExamMarks access']);
        $permission = Permission::create(['name' => 'ExamMarks create']);
        $permission = Permission::create(['name' => 'ExamMarks edit']);
        $permission = Permission::create(['name' => 'ExamMarks delete']);

        $permission = Permission::create(['name' => 'Exam result']);

        $permission = Permission::create(['name' => 'ExamSchedule access']);
        $permission = Permission::create(['name' => 'ExamSchedule create']);
        $permission = Permission::create(['name' => 'ExamSchedule edit']);
        $permission = Permission::create(['name' => 'ExamSchedule delete']);

        $permission = Permission::create(['name' => 'Expense access']);
        $permission = Permission::create(['name' => 'Expense create']);
        $permission = Permission::create(['name' => 'Expense edit']);
        $permission = Permission::create(['name' => 'Expense delete']);

        $permission = Permission::create(['name' => 'FeeCollection access']);
        $permission = Permission::create(['name' => 'FeeCollection create']);
        $permission = Permission::create(['name' => 'FeeCollection edit']);
        $permission = Permission::create(['name' => 'FeeCollection delete']);

        $permission = Permission::create(['name' => 'MailSetting access']);
        $permission = Permission::create(['name' => 'MailSetting create']);
        $permission = Permission::create(['name' => 'MailSetting edit']);
        $permission = Permission::create(['name' => 'MailSetting delete']);

        $permission = Permission::create(['name' => 'Salary access']);
        $permission = Permission::create(['name' => 'Salary create']);
        $permission = Permission::create(['name' => 'Salary edit']);
        $permission = Permission::create(['name' => 'Salary delete']);

        $permission = Permission::create(['name' => 'Salarysheet access']);
        $permission = Permission::create(['name' => 'Salarysheet create']);
        $permission = Permission::create(['name' => 'Salarysheet edit']);
        $permission = Permission::create(['name' => 'Salarysheet delete']);

        $permission = Permission::create(['name' => 'Student access']);
        $permission = Permission::create(['name' => 'Student create']);
        $permission = Permission::create(['name' => 'Student edit']);
        $permission = Permission::create(['name' => 'Student delete']);

        $permission = Permission::create(['name' => 'StudentPromotion access']);
        $permission = Permission::create(['name' => 'StudentPromotion create']);
        $permission = Permission::create(['name' => 'StudentPromotion edit']);
        $permission = Permission::create(['name' => 'StudentPromotion delete']);

        $permission = Permission::create(['name' => 'Subject access']);
        $permission = Permission::create(['name' => 'Subject create']);
        $permission = Permission::create(['name' => 'Subject edit']);
        $permission = Permission::create(['name' => 'Subject delete']);

        $permission = Permission::create(['name' => 'System config control']);
        $permission = Permission::create(['name' => 'System config create']);

        $admin->givePermissionTo(Permission::all());
    }
}
