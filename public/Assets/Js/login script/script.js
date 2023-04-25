var a;
function pass(){
    if(a==1){
        document.getElementById('password').type='password';
        document.getElementById('pass-icon').src="http://localhost:8000/Assets/img/eye_slash.png";
        a=0;
    } else {
        document.getElementById('password').type='text';
        document.getElementById('pass-icon').src="http://localhost:8000/Assets/img/eye.png";
        a=1;
    }
}