import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import { TextControl, TextareaControl } from '@wordpress/components';
import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
    return (
        <div { ...useBlockProps() }>
            <TextControl
                label={ __( 'Titel', 'jjkommunikation' ) }
                value={ attributes.title }
                onChange={ ( newTitle ) => setAttributes( { title: newTitle } ) }
            />
			<TextareaControl
                label={ __( 'Beskrivelse', 'jjkommunikation' ) }
                value={ attributes.desc }
                onChange={ ( newDesc  ) => setAttributes( { desc: newDesc } ) }
            />
        </div>
    );
}