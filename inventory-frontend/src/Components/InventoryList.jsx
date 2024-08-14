import React from 'react';
import '../Styles/InventoryList.css';

const InventoryList = ({ items }) => {
    return (
        <div className="inventory-list">
            <h2>Artículos del Inventario</h2>
            <div className="inventory-grid">
                {items.map(item => (
                    <div key={item.id} className="inventory-item">
                        <h3>{item.name}</h3>
                        <p className="description">{item.description}</p>
                        <div className="item-details">
                            <p className="price">{item.unitPrice.toFixed(2)}Bs</p>
                            <p className="quantity">Cantidad: {item.quantity}</p>
                        </div>
                    </div>
                ))}
            </div>
        </div>
    );
};

export default InventoryList;