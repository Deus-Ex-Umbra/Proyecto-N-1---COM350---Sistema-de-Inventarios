import * as inventoryService from '../services/inventory.service.js';

export const createInventory = async (req, res) => {
    try {
        const data = req.body;
        const inventory = await inventoryService.createInventory(data);
        res.status(201).json(inventory);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

export const updateInventory = async (req, res) => {
    try {
        const id = req.params.id;
        const data = req.body;
        const inventory = await inventoryService.updateInventory(id, data);
        res.status(200).json(inventory);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

export const deleteInventory = async (req, res) => {
    try {
        const id = req.params.id;
        const inventory = await inventoryService.deleteInventory(id);
        res.status(200).json(inventory);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

export const getAllInventories = async (req, res) => {
    try {
        const inventories = await inventoryService.getAllInventories();
        res.status(200).json(inventories);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};

export const getInventoryById = async (req, res) => {
    try {
        const id = req.params.id;
        const inventory = await inventoryService.getInventoryById(id);
        res.status(200).json(inventory);
    } catch (error) {
        res.status(500).json({ message: error.message });
    }
};
