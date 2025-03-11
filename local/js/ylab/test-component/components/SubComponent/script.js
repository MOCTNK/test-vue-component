import './style.css';
export const SubComponent = {
    method: {
        handleClick() {
            this.$emit('customEvent');
        }
    },
    template: `
        <div>
            <h1 @click="handleClick">CLICK</h1>
        </div>
    `
}