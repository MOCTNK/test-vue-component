import './style.css';
import {runAction} from "../../../test-component/app/service";

export const VBox2 = {
    props: {
        error: Boolean
    },
    data()
    {
        return {
            errorData: false
        }
    },
    created() {
        this.errorData = this.error;
    },
    updated() {
        this.errorData = this.error;
    },
    methods: {
        handleClick() {
            this.$emit('update')
            this.errorData = false
        },
    },
    template: `
        <div style="border: 3px solid black; padding: 30px;">
           <input style="outline: none;" :class="{error: errorData}" @click="handleClick" type="text"/>
        </div>
    `
}
