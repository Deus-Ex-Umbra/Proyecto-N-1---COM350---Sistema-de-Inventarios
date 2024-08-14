import './App.css'
import InventoryList from './Components/InventoryList'

const inventoryItems = [
  {
    id: 1,
    name: "Portátil",
    description: "Portátil de alto rendimiento con 16GB RAM y 512GB SSD",
    unitPrice: 999.99,
    quantity: 50
  },
  {
    id: 2,
    name: "Teléfono inteligente",
    description: "Último modelo de teléfono inteligente con capacidad 5G",
    unitPrice: 699.99,
    quantity: 100
  },
  {
    id: 3,
    name: "Auriculares inalámbricos",
    description: "Auriculares inalámbricos con cancelación de ruido y 20 horas de batería",
    unitPrice: 199.99,
    quantity: 75
  },
  {
    id: 4,
    name: "Monitor 4K",
    description: "Monitor 4K Ultra HD de 27 pulgadas con HDR",
    unitPrice: 349.99,
    quantity: 30
  },
  {
    id: 5,
    name: "Teclado mecánico",
    description: "Teclado mecánico RGB con interruptores Cherry MX",
    unitPrice: 129.99,
    quantity: 60
  }
];

function App() {

  return (
    <>
      <header>
        <h1>Sistema de Gestión de Inventario</h1>
      </header>
      <InventoryList items={inventoryItems} />
    </>
  )
}

export default App
