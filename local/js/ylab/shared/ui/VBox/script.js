import './style.css';
import {VBox2} from "../VBox2/script";

export const VBox = {
    components: {
        VBox2
    },
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
            <VBox2 :error="errorData" @update="handleClick"/>
        </div>
    `
}
