interface HousesFilterParams {
    keywords?: string,
    bedrooms?: number,
    bathrooms?: number,
    garages?: number,
    storeys?: number,
    price_from?: number,
    price_to?: number,
}

interface HouseItem {
    id: number,
    title: string,
    price?: number,
    bedrooms?: number,
    bathrooms?: number,
    garages?: number,
    storeys?: number,
}

export type { HousesFilterParams, HouseItem }
