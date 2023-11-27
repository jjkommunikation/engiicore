import { useBlockProps } from '@wordpress/block-editor';

export default function save({ attributes }) {
    const blockProps = useBlockProps.save();
    return (
        <div {...blockProps}>
            <div className='tab-title'>{attributes.title}</div>
            <div className='tab-desc'>{attributes.desc}</div>
        </div>
    );
}
