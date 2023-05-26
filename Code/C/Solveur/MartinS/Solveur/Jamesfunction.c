#include "Header.h"
#include <stdlib.h>
#include <stdio.h>
#include <string.h>



int solveur(char* Board, Coord pos, Coord posMax) {
    int Nb_Island = 0;
    Nb_Island = Island_on_map(Board, pos, posMax);

    printf("%d", Nb_Island);

    while (!Verif_solved(Board, Nb_Island, posMax)) {
        // Regarde si le pont est obligatoire dans une des directions 
        for (int i = 0; i < 4; i++) {
            if (Island_in_a_direction(Board, pos, posMax, i) == 1) {
                int* Type_bridge;
                if (Bridge_mandatory(Board, pos, posMax, i, &Type_bridge)) {
                    Coord pos_copy = pos;
                    while (Is_not_Island(Board, pos_copy, posMax)) {
                        Next_Coord(&pos_copy, i);
                        Place_bridge_on_map(Board, posMax, pos_copy, *Type_bridge);
                    }
                    Next_Coord(&pos_copy, i);
                    Place_island_on_map(Board, pos_copy, posMax, 0);
                    Place_island_on_map(Board, pos, posMax, *(Board + (posMax.x * pos.y) + pos.x) - *Type_bridge +1);
                }
            }
        }




    }

    

    



    

}