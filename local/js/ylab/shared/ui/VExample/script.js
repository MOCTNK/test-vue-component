import './style.css';

export const VExample = {
    props: {
        name: String
    },
    template: `
        <div>
            <h1>Example</h1>
            <div>{{ name }}</div>
        </div>
    `
}
