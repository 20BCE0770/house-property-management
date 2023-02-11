$(document).ready(function(){
    $(window).scroll(function(){
        if(this.scrollY > 0.1){
            $('.navbar').Classlist.add("sticky");
        }else{

        }
    })
})