<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Common;
use App\Models\Employee;
use App\Models\EmployeeLeave;
use App\Models\EmployeeLeaveBalance;

class Common extends Model
{    
    public static function dateDiffInDays($from_date, $to_date) 
    { 
        $diff = strtotime($to_date) - strtotime($from_date); 
        return abs(round($diff / 86400)); 
    } 

    public static function crossCheckAnnualLeaveBalance()
    {
        $employees = Employee::all();

        foreach($employees as $employee)
        {
            $employee_leave_balances = EmployeeLeaveBalance::where('employee_id',$employee->id)->get();
        
            //calculate leave balance and update db
            if(count($employee_leave_balances) <= 0)
            {
                $employment_date = $employee->employment_date;
                $employment_year = date('Y', strtotime($employment_date));
                $today = date('Y-m-d');
                $this_year = date('Y');
                $all_years = $this_year-$employment_year;
                $last_year_date = $employment_date;
                $yearly_leave_balance = 18;

                for($i=$employment_year;$i<=($employment_year+$all_years);$i++)
                {     
                    if($i==$this_year)
                    {
                        $days_difference = Common::dateDiffInDays($today, $employment_date);
                        $yearly_leave_balance += round($days_difference*(21/365.0));
                        //echo "Year: (From: ".$employment_date." to ".$today.")".$i." => ".$days_difference.", Balance: ".$yearly_leave_balance."<br/>";
                        
                        $future_year = date('Y-m-d', strtotime('+1 year', strtotime($employment_date)) );
                        $employee_leave_balance = new EmployeeLeaveBalance();
                        $employee_leave_balance->employee_id= $employee->id;
                        $employee_leave_balance->year = $i;
                        $employee_leave_balance->initial_balance = $yearly_leave_balance;
                        $employee_leave_balance->total_taken = 0;
                        $employee_leave_balance->left_balance = $yearly_leave_balance;
                        $employee_leave_balance->expiry_date = $future_year;

                        $employee_leave_balance->save();
                    }
                    else
                    {
                        $future_year = date('Y-m-d', strtotime('+1 year', strtotime($employment_date)) );
                        $days_difference = Common::dateDiffInDays($future_year, $employment_date);
                        //$yearly_leave_balance = round($days_difference*(21/365.0))+1;
                        //echo "Year: (From: ".$employment_date." to ".$future_year.")".$i." => ".$days_difference.", Balance: ".$yearly_leave_balance."<br/>";
                                            
                        $employee_leave_balance = new EmployeeLeaveBalance();
                        $employee_leave_balance->employee_id= $employee->id;
                        $employee_leave_balance->year = $i;
                        $employee_leave_balance->initial_balance = $yearly_leave_balance;
                        $employee_leave_balance->total_taken = 0;
                        $employee_leave_balance->left_balance = $yearly_leave_balance;
                        $employee_leave_balance->expiry_date = $future_year;

                        $employee_leave_balance->save();

                        $employment_date = $future_year;
                        $yearly_leave_balance +=1;
                    }
                }
            }
        }
    }

    public static function getWeekDays()
    {
        $week_days = "<option value='0' disabled>Select Weekday</option>";
            $week_days .= "<option value='1'>Monday</option>";
            $week_days .= "<option value='2'>Tuesday</option>";
            $week_days .= "<option value='3'>Wednsday</option>";
            $week_days .= "<option value='4'>Thursday</option>";
            $week_days .= "<option value='5'>Friday</option>";
            $week_days .= "<option value='6'>Saturday</option>";
            $week_days .= "<option value='7'>Sunday</option>";            
        return $week_days;
    }

    public static function formatDate($date)
    {
        return date('Y-m-d',strtotime($date));
    }
}