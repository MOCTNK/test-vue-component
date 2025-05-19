import {BitrixVue} from 'ui.vue3';
import './style/style.css';
import {VExample} from "../../shared/ui/VExample/script";
import { VInput } from  "../components/VInput/script";
import {runAction} from "./service";
import {VFileReader} from "../../shared/ui/VFileReader/script";

const TestComponent = {
    name: 'TestComponent',
    components: {
        VExample,
        VInput,
        VFileReader
    },
    props: {
        signedParameters: String,
        messages: String,
        baseData: String,
        component: String,
    },
    data()
    {
        return {
            BXmessages: BX.parseJSON(this.messages),
            params: this.signedParameters,
            component: this.component,
            formData: {
                lastName: '',
            }
        }
    },
    created() {
        let data = BX.parseJSON(this.baseData);
        this.formData.lastName = data?.lastName ?? '';
    },
    methods: {
        handleUpdateLastName(value) {
            this.formData.lastName = value;
        },
        handleClick() {
            let payload = {
                lastName: this.formData.lastName
            }
            runAction('updateLastName', payload, this.component, this.signedParameters).then((response) => {
                alert('change last name');
            }).catch((e) => {
                alert('error');
                console.log(e.errors);
            })
        },
        handleUpload(files) {
            let formDataFile = new FormData();
            if(files[0]) {
                formDataFile.set('file', files[0])
            }
            runAction('uploadFiles', formDataFile, this.component, this.signedParameters).then((response) => {
                alert('saveFiles');
            }).catch((e) => {
                alert('error');
                console.log(e.errors);
            })
        },
    },
    template: `
        <div>

            <VInput 
                :value="formData.lastName"
                @update="handleUpdateLastName"
            />
            <button
                @click="handleClick"
            >click</button>
            <VFileReader
                @upload="handleUpload"
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
