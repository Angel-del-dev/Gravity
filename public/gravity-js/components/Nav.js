function clickTest2()
{
    document.getElementById('nav').addEventListener('click', function(){
        console.log('Nav working!');
    });
}

export function nav(id) 
{
    return {
        events : [
            clickTest2,
        ],
        body : (`
            <div id="nav">Hello there #${id}</div>
        `)
    };
}