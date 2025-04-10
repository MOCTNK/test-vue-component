import './style.css';
export const VInput = {
    props: {
        value: {
            default: '',
            type: String
        },
    },
    data()
    {
        return {
            formData: {
                value: '',
            }
        }
    },

    created() {
        this.formData.value = this.value;
    },

    methods: {
        handleUpdate(event) {
            this.formData.value = event.target.value;
            this.$emit('update', this.formData.value)
        },
    },

    template: `
        <div>
            <input
                :value="formData.value"
                @input="(value) => handleUpdate(value)"
            />
        </div>
    `
}