<?php
use Illuminate\Support\Facades\DB;


function getTopNavCat(){
    $result = DB::table('categories')->where(['status'=>1])->get();
    $arr=[];
    foreach($result as $row){
        $arr[$row->id]['category_name']=$row->category_name;
        $arr[$row->id]['parent_id']=$row->parent_category_id;
    }
    $html = buildTreeView($arr,0);
    return $html;

}

$html = '';

function buildTreeView($arr,$parent,$level=0,$prelevel=-1){
    global $html;
    foreach($arr as $id=>$data){
        if($parent==$data['parent_id']){
            if($level>$prevlevel){
                if($html==''){
                    $html.='<ul class="nav navbar-nav">';
                }else{
                    $html.='<ul class="dropdown-menu">';
                }
            }
            if($level==$prelevel){
                $html.='<li>';
            }
            $html.='<li><a href="#">'.$data['city'].'<span class="caret"></span></a>';
            if($level>$prevlevel){
                $prelevel=$level;
            }
            $level++;
            buildTreeView($arr,$parent,$level,$prelevel);
            $level--;
        }
    }
}
?>
