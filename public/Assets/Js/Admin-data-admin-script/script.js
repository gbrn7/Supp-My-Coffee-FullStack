var a;
function pass(){
    if(a==1){
        document.getElementById('password').type='password';
        document.querySelector('.pass-icon').classList.remove('ri-eye-fill');
        a=0;
    } else {
        document.getElementById('password').type='text';
        document.querySelector('.pass-icon').classList.add('ri-eye-fill');
        a=1;
    }
}

