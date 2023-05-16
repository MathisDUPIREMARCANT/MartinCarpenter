#include "Header.h"
#include <stdio.h>
#include <stdlib.h>

void from_C_to_Json_ile(Island ile) {
	printf("Island : [ x : %d, y : %d, coord : %d,%d, number : %d]", ile.coordo.x, ile.coordo.y, ile.number)
    
}
void from_C_to_Json_pont(Bridge pont) {
    printf("Bridge : [ width : %d, lenght : %d, coord : %d,%d, direction : %c]", pont.size, pont.lenght, pont.coordo.x, pont.coordo.y, pont.direction
}

void from_C_to_Json(Bridge *liste[], Island
