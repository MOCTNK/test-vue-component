import {BitrixVue} from 'ui.vue3';
import './style/style.css';
import {SubComponent} from "../components/SubComponent/script";
import {VExample} from "../../shared/ui/VExample/script";

const TestComponent = {
    name: 'TestComponent',
    components: {
        SubComponent,
        VExample
    },
    props: {
        fields: Array
    },
    method: {
        handleCustomEvent() {
            alert('CLICK');
        }
    },
    template: `
        <div>

            <h1>My</h1>
            <VExample 
                :name="'TEST name'"
            />
            <SubComponent 
                @customEvent="handleCustomEvent()"
            />

        </div>
    `
}


document.addEventListener("DOMContentLoaded", () => {
    BitrixVue.createApp({
        components: {
            TestComponent
        }
    }).mount(document.querySelector('#test-component'));
})
