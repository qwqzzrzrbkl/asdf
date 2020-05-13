<?php
/**
 *      ┌─┐       ┌─┐
 *   ┌──┘ ┴───────┘ ┴──┐
 *   │                 │
 *   │       ───       │
 *   │  ─┬┘       └┬─  │
 *   │                 │
 *   │       ─┴─       │
 *   │                 │
 *   └───┐         ┌───┘
 *       │         │
 *       │         │
 *       │         │
 *       │         └──────────────┐
 *       │                        │
 *       │                        ├─┐
 *       │                        ┌─┘
 *       │                        │
 *       └─┐  ┐  ┌───────┬──┐  ┌──┘
 *         │ ─┤ ─┤       │ ─┤ ─┤
 *         └──┴──┘       └──┴──┘
 *                神兽保佑
 *               代码无BUG!
 */

class Student extends CI_Controller
{	
	
	function __construct()
	{

		parent::__construct();
		$this->load->model('Stu_model');
	}
	
	// 根据学生ID查成绩
	public function get_SID_by_score()
	{
    
    	if (!empty($_POST)){
    	//不为空说明提交上来有数据，空的也是数据
    	$SID = $_POST["SID"];//获取学号
        
        if ($SID==''){//判断是否为空
        echo '您还没有输入学号';

      	} else {

      		if (is_numeric($SID)){//判断$SID是否是数字型或字符串数字
           	$SID+=0;//将字符串转成数字型

           		if (is_int($SID)){//判断是否是整形

           		} else {
           	  	echo '您输入的不是整数';
            	}

			} else {

            echo '您输入的不是数字';
        	}

      	}

    	}

	$re = $this->Stu_model->get_SID_by_score($SID);
    echo json_encode($re);      
}

	// 查询年份学生
	public function sear_student_age()
	{

		$year=$_POST["$year"];
		// $year = "1991";
		$re = $this->Stu_model->sear_student_age($year);
		var_dump($re);

	}

	//增加学生记录
	public function save_student_msg()
	{

    	if (!empty( $_POST )){//不为空说明提交上来有数据，空的也是数据
		//$SID = '04';
    	$SID = $_POST[" SID "];//获取学号
        
        if ($SID == ''){//判断是否为空
        echo '您还没有输入学号' ; die ;
      	
      	} else {

      		if (is_numeric( $SID )){//判断$SID是否是数字型或字符串数字
           	$SID += 0;//将字符串转成数字型
           
           		if (is_int( $SID )){//判断是否是整形
           		
           		} else {

           	  	echo '您输入的不是整数' ; die ;
           		}

        	} else {
            echo '您输入的不是数字' ; die ;//尽管不是数字，但还是能插进数据？？？
       	 	}

     	}

     	}

    //修改姓名
    if (!empty($_POST)){
	$Sname = $_POST[" Sname "];//获取姓名
	// $Snam = '李宏安';

		if ( $Sname == '' ){
	    echo '您还没有输入姓名'; die ;
	    
	    } else {

			if ( is_string($Sname )){

			} else {

	      	echo '您输入的不是字符串' ; die ;
			}

	    }

		}

	//修改出生年月	
	$Sage = $_POST["Sage"];
	// $Sage = "1990-01-01 00:00:00";

	//修改性别
	$Ssex = $_POST["Ssex"];
	if (!($_POST["Ssex"]=='男'||$_POST["Ssex"]=='女'));
	// {
	// }else{	
	// 	echo '请输入正确性别';die;}
	// $Ssex = '男';

	$re = $this->Stu_model->save_student_msg($SID,$Sname,$Sage,$Ssex);
	echo json_encode ($re);	

    }

	//更新
	public function update_student_row()
	{
    	$SID = $_POST["SID"];
    	$Sname = $_POST["Sname"];
		$Sage = $_POST["Sage"];
		$Ssex = $_POST["Ssex"];

	$re = $this->Stu_model->update_student_row($SID,$Sname,$Sage,$Ssex);//控制器只是接收参数，并传输参数，以及调用model中的方法，其他没说什么用
	var_dump($re);

    }

    // 删除
	public function delete_student_row()
	{

		$SID = $_POST["SID"];
		// $SID= 'wqqwwq';
		$re = $this->Stu_model->delete_student_row($SID);
		echo json_encode ($re);

	}
    
}
