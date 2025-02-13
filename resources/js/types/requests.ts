type ErrorsBag = Record<string, Array<string>>

interface ErrorResponse {
    message?: string
    errors: ErrorsBag
}

export type { ErrorResponse, ErrorsBag }
