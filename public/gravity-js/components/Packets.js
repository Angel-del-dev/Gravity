import { nav } from './Nav.js';

export class Packets 
{
    clickTest()
    {
        const test = document.getElementById('test');
        test.addEventListener('click', function() {
            this.style.backgroundColor = 'black';
            this.style.color = 'white';
        });
    }

    logging ({ user, id }) {
        const navObj = nav(id);
        return {
            events : [
                this.clickTest,
                ...navObj.events
            ],
            body : (`
                ${navObj.body}
                <div id='test'>My name is ${user.name}</div>
            `)
        };
    }
}