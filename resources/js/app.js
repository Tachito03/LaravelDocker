require('./bootstrap');
/*
function loggedIn(){
    return localStorage.getItem('auth');
}


router.beforeEach((to, from) => {
    if(to.matched.some(record => record.meta.requiresAuth)){
        if(!loggedIn()){
            next({
                path: '/login',
                query: {redirect: to.fullPath}
            })
        }else{
            next();
        }
    }else if(to.matched.some(record => record.meta.guest)){
        if(!loggedIn()){
            next({
                path: '/',
                query: {redirect: to.fullPath}
            })
        }else{
            next();
        }   
    }else{
        next();
    }
  })*/
