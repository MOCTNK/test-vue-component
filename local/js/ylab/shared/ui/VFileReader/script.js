export const VFileReader = {
    props: {
        name: String
    },
    data()
    {
        return {
            formData: {
                value: [],
            }
        }
    },
    methods: {
        handleInput(event) {
            this.formData.value = event?.target?.files ?? [];
            this.$emit('upload', this.formData.value)
        }
    },
    template: `
        <div>
            <input type="file" @input="handleInput">
        </div>
    `
}
