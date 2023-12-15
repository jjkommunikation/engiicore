import { __ } from '@wordpress/i18n';
import { useBlockProps, MediaUpload, MediaUploadCheck, RichText } from '@wordpress/block-editor';
import { Panel, PanelBody, PanelRow, Button } from '@wordpress/components';
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
    const { panels } = attributes;

    const addPanel = () => {
        const newPanels = [...panels, { subtitle: "", heading: "", desc: "", iconUrl: "", imageUrl: ""}];
        setAttributes({ panels: newPanels });
    };

    const removePanel = (index) => {
        const newPanels = panels.filter((_, idx) => idx !== index);
        setAttributes({ panels: newPanels });
    };

    const onSelectImage = (media, index) => {
        const newPanels = [...panels];
        newPanels[index].imageUrl = media.url;
        setAttributes({ panels: newPanels });
    };

    const onSelectIcon = (media, index) => {
        const newPanels = [...panels];
        newPanels[index].iconUrl = media.url;
        setAttributes({ panels: newPanels });
    };

    const updatePanelAttribute = (index, attribute, value) => {
        const newPanels = [...panels];
        newPanels[index][attribute] = value;
        setAttributes({ panels: newPanels });
    };

    return (
        <div {...useBlockProps()}>
            {panels.map((panel, index) => (
               
                <Panel key={index}>
                    <PanelBody
                        header={`Panel ${index + 1}`}
                        title={panel.subtitle ? panel.subtitle : `Tab ${index + 1}`}
                        icon={panel.iconUrl ? <img src={panel.iconUrl} alt={__('Selected icon', 'text-domain')} /> : <svg viewBox="-2 -2 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 10c0-5.51-4.49-10-10-10C4.48 0 0 4.49 0 10c0 5.52 4.48 10 10 10 5.51 0 10-4.48 10-10zM7.78 15.37L4.37 6.22c.55-.02 1.17-.08 1.17-.08.5-.06.44-1.13-.06-1.11 0 0-1.45.11-2.37.11-.18 0-.37 0-.58-.01C4.12 2.69 6.87 1.11 10 1.11c2.33 0 4.45.87 6.05 2.34-.68-.11-1.65.39-1.65 1.58 0 .74.45 1.36.9 2.1.35.61.55 1.36.55 2.46 0 1.49-1.4 5-1.4 5l-3.03-8.37c.54-.02.82-.17.82-.17.5-.05.44-1.25-.06-1.22 0 0-1.44.12-2.38.12-.87 0-2.33-.12-2.33-.12-.5-.03-.56 1.2-.06 1.22l.92.08 1.26 3.41zM17.41 10c.24-.64.74-1.87.43-4.25.7 1.29 1.05 2.71 1.05 4.25 0 3.29-1.73 6.24-4.4 7.78.97-2.59 1.94-5.2 2.92-7.78zM6.1 18.09C3.12 16.65 1.11 13.53 1.11 10c0-1.3.23-2.48.72-3.59C3.25 10.3 4.67 14.2 6.1 18.09zm4.03-6.63l2.58 6.98c-.86.29-1.76.45-2.71.45-.79 0-1.57-.11-2.29-.33.81-2.38 1.62-4.74 2.42-7.1z" /></svg>}
                    > 
                        <PanelRow>
                            <RichText
                                tagName='span'
                                value={ panel.subtitle }
                                onChange={(newSubtitle) => updatePanelAttribute(index, 'subtitle', newSubtitle)}
                                placeholder={ __( 'Short heading...' ) }
                            />
                        </PanelRow>
                        <PanelRow>
                            <RichText
                                tagName='h2'
                                value={ panel.heading }
                                onChange={(newHeading) => updatePanelAttribute(index, 'heading', newHeading)}
                                placeholder={ __( 'Heading...' ) }
                            />
                        </PanelRow> 
                        <PanelRow>
                            <RichText
                                tagName='div'
                                value={ panel.desc }
                                onChange={(newDesc) => updatePanelAttribute(index, 'desc', newDesc)}
                                placeholder={ __( 'Description...' ) }
                            />
                             {panel.imageUrl && <img src={panel.imageUrl} alt={__('Selected image', 'text-domain')}/>}

                        </PanelRow>
                        <PanelRow>
                            <MediaUploadCheck>
                                <MediaUpload
                                    onSelect={(media) => onSelectIcon(media, index)}
                                    allowedTypes={['image']}
                                    value={panel.iconUrl}
                                    render={({ open }) => (
                                        <Button isPrimary onClick={open}>
                                            {panel.iconUrl ? __('Change Icon', 'text-domain') : __('Select Icon', 'text-domain')}
                                        </Button>
                                    )}
                                />
                            </MediaUploadCheck>
                        </PanelRow>
                        <PanelRow>
                            <MediaUploadCheck>
                                <MediaUpload
                                    onSelect={(media) => onSelectImage(media, index)}
                                    allowedTypes={['image']}
                                    value={panel.imageUrl}
                                    render={({ open }) => (
                                        <Button isPrimary onClick={open}>
                                            {panel.imageUrl ? __('Change Image', 'text-domain') : __('Select Image', 'text-domain')}
                                        </Button>
                                    )}
                                />
                            </MediaUploadCheck>
                        </PanelRow>
                        <PanelRow>
                            <Button isPrimary isDestructive onClick={() => removePanel(index)}>
                                {__('Remove Panel', 'text-domain')}
                            </Button>
                        </PanelRow>
                    </PanelBody>
                </Panel>
            ))}
            
            <Button isPrimary onClick={addPanel}>
                {__('Add Panel', 'text-domain')}
            </Button>
        </div>
    );
}
