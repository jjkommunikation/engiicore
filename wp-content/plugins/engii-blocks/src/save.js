import { useBlockProps } from '@wordpress/block-editor';
import { RichText } from '@wordpress/block-editor';


export default function save({ attributes }) {
    const blockProps = useBlockProps.save();
    const { panels } = attributes;


    return (
        <div { ...blockProps }>
        <div className="custom-tabs">
            <ul className="tab-titles">
                {panels.map((panel, index) => (
                    <li key={index} className={`tab-title ${index === 0 ? 'active' : ''}`}>
                        {panel.iconUrl && <img src={panel.iconUrl} alt="" />}
                       
  <RichText.Content tagName="span" className="tab-titles-title" value={panel.subtitle} />
                    </li>
                ))}
            </ul>
            <div className="tab-content">
                {panels.map((panel, index) => (
                    <div key={index} className={`tab-panel ${index === 0 ? 'active' : ''}`} style={{ display: 'none' }}>
                        <div>
                        <RichText.Content tagName="span" className="tab-panel--smallheading" value={panel.subtitle} />
                        <RichText.Content tagName="h2" className="tab-panel--heading" value={panel.heading} />
                        <RichText.Content tagName="div" value={panel.desc} />
                      
                          
                        </div>
                        {panel.imageUrl && <img className="tab-panel--image" src={panel.imageUrl} alt="" />}
                        {/* ... other properties */}
                    </div>
                ))}
            </div>
        </div>
        </div>
    );
}
