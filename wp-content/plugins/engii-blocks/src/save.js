export default function save({ attributes }) {
    const { panels } = attributes;

    return (
        <div className="custom-tabs">
            <ul className="tab-titles">
                {panels.map((panel, index) => (
                    <li key={index} className={`tab-title ${index === 0 ? 'active' : ''}`}>
                        {panel.iconUrl && <img src={panel.iconUrl} alt="" />}
                        {panel.subtitle}
                    </li>
                ))}
            </ul>
            <div className="tab-content">
                {panels.map((panel, index) => (
                    <div style="display: none;" key={index} className={`tab-panel ${index === 0 ? 'active' : ''}`}>
                        <div>
                        <span>{panel.subtitle}</span>
                        <h3>{panel.title}</h3>
                        </div>
                        {panel.imageUrl && <img src={panel.imageUrl} alt="" />}
                        {/* ... other properties */}
                    </div>
                ))}
            </div>
        </div>
    );
}
