//Tomáš Růta

#include <stdio.h>

void generuj(int a1, int d, int n)
{
    for(int i = 0; i < n; i++) {
        a1 = a1 + d;
        printf("%d, ", a1);
    }
}
int an(int a1, int d, int n)
{
    n = a1 + (n - 1) * d;
    printf("\n");
    printf("n-ty clen = %d\n", n);
    printf("prvni prvek a1 = %d", a1);
    printf("\ndiference = %d", d);
}
int main()
{
    generuj (5,7,12);
    an(5,7,13);
}