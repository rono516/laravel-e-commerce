export default function SecondaryButton({
    type = 'button',
    className = '',
    disabled,
    children,
    ...props
}) {
    return (
        <button
            {...props}
            type={type}
            className={
                `btn` + className
            }
            disabled={disabled}
        >
            {children}
        </button>
    );
}
