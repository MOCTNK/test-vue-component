const BX_COMPONENT_TYPE = 'class';

export const runAction = (action, payload, componentName, signedParameters) => {
    return BX.ajax.runComponentAction(componentName, action, {
        mode: BX_COMPONENT_TYPE,
        signedParameters: signedParameters,
        data: payload,
    })
}
